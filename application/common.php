<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
function pagination($total, $pageIndex, $pageSize = 15, $context = array('ajaxcallback' => '', 'url' => '', 'param' => array()))
{
    $pdata = array(
        'tcount' => 0,
        'tpage' => 0,
        'cindex' => 0,
        'findex' => 0,
        'pindex' => 0,
        'nindex' => 0,
        'lindex' => 0,
        'options' => ''
    );

    $pdata['tcount'] = $total;
    $pdata['tpage'] = ceil($total / $pageSize);
    if ($pdata['tpage'] <= 1) {
        return '';
    }
    $cindex = $pageIndex;
    $cindex = min($cindex, $pdata['tpage']);
    $cindex = max($cindex, 1);
    $pdata['cindex'] = $cindex;
    $pdata['findex'] = 1;
    $pdata['pindex'] = $cindex > 1 ? $cindex - 1 : 1;
    $pdata['nindex'] = $cindex < $pdata['tpage'] ? $cindex + 1 : $pdata['tpage'];
    $pdata['lindex'] = $pdata['tpage'];

    if (!empty($context['ajaxcallback'])) {
        $pdata['faa'] = 'href="javascript:;"' . ' onclick="' . $context['ajaxcallback'] . '(' . $pdata['findex'] . ');return false;"';
        $pdata['paa'] = 'href="javascript:;"' . ' onclick="' . $context['ajaxcallback'] . '(' . $pdata['pindex'] . ');return false;"';
        $pdata['naa'] = 'href="javascript:;"' . ' onclick="' . $context['ajaxcallback'] . '(' . $pdata['nindex'] . ');return false;"';
        $pdata['laa'] = 'href="javascript:;"' . ' onclick="' . $context['ajaxcallback'] . '(' . $pdata['lindex'] . ');return false;"';
    } else {
        $_GET['page'] = $pdata['findex'];
        $pdata['faa'] = 'href="' . $context['url'] . '?' . http_build_query($_GET) . '"';
        $_GET['page'] = $pdata['pindex'];
        $pdata['paa'] = 'href="' . $context['url'] . '?' . http_build_query($_GET) . '"';
        $_GET['page'] = $pdata['nindex'];
        $pdata['naa'] = 'href="' . $context['url'] . '?' . http_build_query($_GET) . '"';
        $_GET['page'] = $pdata['lindex'];
        $pdata['laa'] = 'href="' . $context['url'] . '?' . http_build_query($_GET) . '"';
    }

    $html = '<div class="layui-box layui-laypage layui-laypage-default">';
    if ($pdata['cindex'] > 1) {
        $html .= "<a {$pdata['faa']} class=\"layui-laypage-last\">首页</a>";
        $html .= "<a {$pdata['paa']} class=\"layui-laypage-prev\">上一页</a>";
    }

    $range = array();
    $range['start'] = max(1, $pdata['cindex'] - 4);
    $range['end'] = min($pdata['tpage'], $pdata['cindex'] + 4);
    if ($range['end'] - $range['start'] < 4 + 4) {
        $range['end'] = min($pdata['tpage'], $range['start'] + 4 + 4);
        $range['start'] = max(1, $range['end'] - 4 - 4);
    }
    for ($i = $range['start']; $i <= $range['end']; $i++) {
        if (!empty($context['ajaxcallback'])) {
            $aa = 'href="javascript:;"' . ' onclick="' . $context['ajaxcallback'] . '(' . $i . ');return false;"';
        } else {
            $_GET['page'] = $i;
            if (!empty($context['param'])) {
                foreach ($context['param'] as $keyp => $valp) {
                    $_GET[$keyp] = $valp;
                }
            }
            $aa = 'href="' . $context['url'] . '?' . http_build_query($_GET) . '"';
        }
        $html .= ($i == $pdata['cindex'] ? '<span class="layui-laypage-curr"><em class="layui-laypage-em"></em><em>' . $i . '</em></span>' . $i . '</a>' : "<a {$aa}>" . $i . '</a>');
    }

    if ($pdata['cindex'] < $pdata['tpage']) {
        $html .= "<a {$pdata['naa']} class=\"layui-laypage-next\">下一页</a>";
        $html .= "<a {$pdata['laa']} class=\"layui-laypage-last\">尾页</a>";
    }
    $html .= '</div>';
    return $html;
}