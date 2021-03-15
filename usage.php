<?php
    $prevStat=shell_exec("cat /proc/stat");
    $prevArr=explode(" ",trim($prevStat));
    //100% czasu procesora: Arr[2] user + [3] nice + [4] system + 5 idle + 6 iowait + 7 irq + 8 softirq + 9 steal; guest i guestnice są wliczone w user i nice
    $prevIdle=$prevArr[5]+$prevArr[6];
    $prevNonIdle=$prevArr[2]+$prevArr[3]+$prevArr[4]+$prevArr[7]+$prevArr[8]+$prevArr[9];
    $prevTotal=$prevIdle+$prevNonIdle;
    //sekunda zanim pobierzemy nowe dane
    usleep(100000);
    $stat=shell_exec("cat /proc/stat");
    $arr=explode(" ",trim($stat));
    $idle=$arr[5]+$arr[6];
    $nonIdle=$arr[2]+$arr[3]+$arr[4]+$arr[7]+$arr[8]+$arr[9];
    $total=$idle+$nonIdle;
    $totald=$total-$prevTotal;
    $idled=$idle-$prevIdle;
    echo intval((($totald-$idled)/$totald)*100);
?>
