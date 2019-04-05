<?php
function saveLog($path='default',$msg)
{
    \SeasLog::setLogger($path);
    \SeasLog::info($msg);
}

saveLog('test','哈哈');