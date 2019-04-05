<?php
function saveLog($path='gd_mobile',$msg)
{
    \SeasLog::setLogger($path);
    \SeasLog::info($msg);
}

saveLog('test','哈哈');