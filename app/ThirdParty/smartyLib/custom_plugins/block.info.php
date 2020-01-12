<?php
/*
 * Smarty plugin
 * -------------------------------------------------------------
 * File:     block.info.php
 * Type:     block
 * Name:     info
 * Purpose:  display infomation message
 * -------------------------------------------------------------
 */
function smarty_block_info($params, $content, &$smarty, &$repeat)
{
    $title = isset($params['title']) ? $params['title'] : 'Information';
    $id = isset($params['id']) ? $params['id'] : 'msg-info-' . time();

    if (empty($content))
        return null;

    $html =<<<HTML
        <div class="msg msg-info" id="{$id}">
            <div class="msg-header">
                <i class="fa fa-info-circle"></i>
                <span class="msg-title">{$title}</span>
            </div>
            <div class="msg-body">
                {$content}
            </div>
        </div>
HTML;

    return $html;
}