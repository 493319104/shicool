<?php
/**
 * 阿里云OSS、MPS
 */
namespace lib;

use OSS\OssClient;
use OSS\Core\OssException;
use OSS\Core\OssUtil;

class OSS
{
    /**
     * @var OSS accessKeyId
     */
    private $accessKeyId = '';
    /**
     * @var OSS accessKeySecret
     */
    private $accessKeySecret = '';
    /**
     * @var OSS服务所在区域
     */
    private $endpoint = '';
    /**
     * @var OSS存储空间
     */
    private $bucket = '';
    /**
     * @var 视频类型
     */
    private $videoType = '';
    /**
     * @var 音乐类型
     */
    private $musicType = '';
    /**
     * @var 可上传最大文件值（M）
     */
    private $uploadSize = '';
    private $oss_expire = 900;
    private $bucket_dir = '';
    public function __construct()
    {
        $this->accessKeyId = config('aliyun_oss.accessKeyId');
        $this->accessKeySecret = config('aliyun_oss.accessKeySecret');
        $this->endpoint = config('aliyun_oss.endpoint');
        $this->bucket = config('aliyun_oss.bucket');
        $this->videoType = config('video_type');
        $this->musicType = config('music_type');
        $this->uploadSize = config('upload_size');
        $this->bucket_dir = config('bucket_dir');
        try {
            $this->ossClient = new OssClient($this->accessKeyId, $this->accessKeySecret, $this->endpoint);
        } catch (OssException $e) {
            return array('code' => 0, 'codeinfo' => 'OSS连接失败', 'ossException' => $e->getMessage());
        }
    }

    /**
     * 上传视频
     * @param $fileInfo 上传文件详情
     * @return array|void
     */
    public function uploadVideo($files)
    {
        $res = $this->validateFile($files);
        if ($res['code'] == 0) {
            return $res;
        }
        $file_name = time() . '.' . $res['fileType'];
        try{
            //$this->ossClient->uploadFile($this->bucket, $object, $filePath);
            $res = $this ->ossClient->putObject($this -> bucket, $file_name, file_get_contents($files['tmp_name']));
            var_dump($res);exit;
        } catch(OssException $e) {
            return array('code' => 0, 'codeinfo' => 'OSS连接失败', 'ossException' => $e->getMessage());
        }
    }
    private function validateFile($fileInfo)
    {
        if (empty($fileInfo)) {
            return array('code' => 0, 'codeinfo' => '上传内容不能为空');
        }
        if (intval($fileInfo['error']) > 0) {
            return array('code' => 0, 'codeinfo' => '上传文件错误');
        }
        if ($fileInfo['size'] / (1024 * 1024) > $this->uploadSize) {
            return array('code' => 0, 'codeinfo' => '上传文件大小不能超过' . $this->uploadSize . 'M');
        }
        list($maintype, $subtype) = explode("/", $fileInfo['type']);
        if (!in_array(strtolower($subtype), $this->videoType) && !in_array(strtolower($subtype), $this->musicType)) {
            return array('code' => 0, 'codeinfo' => '上传文件格式不对');
        }
        return array('code' => 1, 'fileType' => $subtype);
    }



    private function gmt_iso8601($time) {
        $dtStr = date("c", $time); //格式为2016-12-27T09:10:11+08:00
        $mydatetime = new DateTime($dtStr);
        $expiration = $mydatetime->format(DateTime::ISO8601); //格式为2016-12-27T09:12:32+0800
        $pos = strpos($expiration, '+');
        $expiration = substr($expiration, 0, $pos);//格式为2016-12-27T09:12:32
        return $expiration."Z";
    }
    /**
     * @function getPolicy 获取policy
     * @author
     * @version 1.0
     * @date
     * @param $dir 上传目录
     * @param $maxSize 最大文件大小 单位M
     * @param int $expireTime 过期时间
     * @return $array policy
     */
    public function getPolicy(){
        $expireTime = $this->oss_expire;
        $end = time() + $expireTime;
        $expiration = $this->gmt_iso8601($end);
        $conditions = [];
        $conditions[] = array(0=>'content-length-range', 1=>0, 2=>1024*1024*$this->uploadSize); // 最大文件大小.用户可以自己设置 100M
        $start = array(0=>'starts-with', 1=>'$key', 2=>$this->bucket_dir); //表示用户上传的数据,必须是以$dir开始, 不然上传会失败,这一步不是必须项,只是为了安全起见,防止用户通过policy上传到别人的目录
        $conditions[] = $start;
        $callbackUrl = "http://oss-demo.aliyuncs.com:23450";
        $callback_param = array('callbackUrl'=>$callbackUrl,
            'callbackBody'=>'filename=${object}&size=${size}&mimeType=${mimeType}&height=${imageInfo.height}&width=${imageInfo.width}',
            'callbackBodyType'=>"application/x-www-form-urlencoded");
        $callback_string = json_encode($callback_param);
        $base64_callback_body = base64_encode($callback_string);

        $arr = array('expiration'=>$expiration,'conditions'=>$conditions);
        $policy = json_encode($arr);
        $base64_policy = base64_encode($policy);
        $string_to_sign = $base64_policy;
        $signature = base64_encode(hash_hmac('sha1', $string_to_sign, $this->accessKeySecret, true));

        $response = array();
        $response['accessid'] = $this->accessKeyId;
        $response['host'] = $this->endpoint;
        $response['policy'] = $base64_policy;
        $response['signature'] = $signature;
        $response['expire'] = $end;
        $response['bucket'] = $this->bucket;
        $response['callback'] = $base64_callback_body;
        $response['dir'] = $this->bucket_dir;  //这个参数是设置用户上传指定的前缀

        return $response;
    }



}