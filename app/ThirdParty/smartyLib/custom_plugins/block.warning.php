<?php
/*
 * Smarty plugin
 * -------------------------------------------------------------
 * File:     block.warning.php
 * Type:     block
 * Name:     warning
 * Purpose:  display infomation message
 * -------------------------------------------------------------
 */
function smarty_block_warning($params, $content, &$smarty, &$repeat)
{
    $title = isset($params['title']) ? $params['title'] : 'Warning';
    $id = isset($params['id']) ? $params['id'] : 'msg-warning-' . time();

    if (empty($content))
        return null;

    $html =<<<HTML
        <div class="msg msg-warning" id="{$id}">
            <div class="msg-header">
                <i class="fa fa-exclamation-triangle"></i>
                <span class="msg-title">{$title}</span>
            </div>
            <div class="msg-body">
                {$content}
            </div>
        </div>
HTML;

    return $html;
}