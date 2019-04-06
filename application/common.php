<?php
//+------------------------公共函数文件--------------------------
function saveLog($path='default',$msg)
{
    \SeasLog::setLogger($path);
    \SeasLog::info($msg);
}