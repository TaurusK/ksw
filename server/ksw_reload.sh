echo 'Reloading......'
pid=$(pidof ksw)
echo $pid
kill -USR1 $pid
echo 'Reload success'