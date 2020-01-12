<?php
/*
 * Smarty plugin
 * -------------------------------------------------------------
 * File:     block.error.php
 * Type:     block
 * Name:     error
 * Purpose:  display error message
 * -------------------------------------------------------------
 */
function smarty_block_error($params, $content, &$smarty, &$repeat)
{
    $title = isset($params['title']) ? $params['title'] : 'Error';
    $id = isset($params['id']) ? $params['id'] : 'msg-error-' . time();

    if (empty($content))
        return null;

    $html =<<<HTML
        <div class="msg msg-error" id="{$id}">
            <div class="msg-header">
                <i class="fa fa-exclamation-circle"></i>
                <span class="msg-title">{$title}</span>
            </div>
            <div class="msg-body">
                {$content}
            </div>
        </div>
HTML;

    return $html;
}