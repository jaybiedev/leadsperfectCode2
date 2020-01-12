<?php
/*
 * Smarty plugin
 * -------------------------------------------------------------
 * File:     block.success.php
 * Type:     block
 * Name:     success
 * Purpose:  display infomation message
 * -------------------------------------------------------------
 */
function smarty_block_success($params, $content, &$smarty, &$repeat)
{
    $title = isset($params['title']) ? $params['title'] : 'Success';
    $id = isset($params['id']) ? $params['id'] : 'msg-success-' . time();

    if (empty($content))
        return null;

    $html =<<<HTML
        <div class="msg msg-success" id="{$id}">
            <div class="msg-header">
                <i class="fa fa-check-circle"></i>
                <span class="msg-title">{$title}</span>
            </div>
            <div class="msg-body">
                {$content}
            </div>
        </div>
HTML;

    return $html;
}