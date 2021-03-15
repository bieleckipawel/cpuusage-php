# cpuusage-php-js-html
idk

PHP script that can calculate current CPU usage.

      // Guest time is already accounted in usertime
           user    nice   system  idle      iowait irq   softirq  steal  guest  guest_nice
      cpu  74608   2520   24433   1117073   6176   4054  0        0      0      0

      Method of calculation

      PrevIdle = previdle + previowait
      Idle = idle + iowait

      PrevNonIdle = prevuser + prevnice + prevsystem + previrq + prevsoftirq + prevsteal
      NonIdle = user + nice + system + irq + softirq + steal

      PrevTotal = PrevIdle + PrevNonIdle
      Total = Idle + NonIdle

      # differentiate: actual value minus the previous one
      totald = Total - PrevTotal
      idled = Idle - PrevIdle

      CPU_Percentage = (totald - idled)/totald

The result is turned into Smoothie (http://smoothiecharts.org/) realtime chart by JavaScript magic!
