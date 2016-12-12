<?php


namespace woz;

class PSSE {


    function __construct() {

        # just in case, due to its stream like, but probabbly not the steam php beleaves it is
        # http://php.net/manual/en/info.configuration.php#ini.max-execution-time
        @set_time_limit(0);

        header('Content-Type: text/event-stream' . PHP_EOL . PHP_EOL);
        header('Cache-Control: no-cache');

        ob_start();
        ob_end_flush();
    }

    public function send($id, $msg, $event = 'message') {

        if(is_array($msg))
            $msg = json_encode($msg);

        $stream = '';
        $stream .= "id: $id" . PHP_EOL;
        $stream .= "event: $event" . PHP_EOL;
        $stream .= "data: $msg" . PHP_EOL;
        $stream .= PHP_EOL;

        # for multiple lines should send many "data: " as lines exists
        # a EOM is finished by a double EOL so  a single EOL next to a data the browser
        # should join them

        echo $stream; # we store in a variable becouse is sweet

        @ob_end_flush();
        flush();
        return $this;
    }

    public function msleep($time) {

        usleep($time * 1000);
        return $this;
    }

    public function run($callback, $condition = true, $msleep = 1000) {

        while($condition) {
            echo "\n";
            if (connection_status() != CONNECTION_NORMAL ) {
                exit;
            }

            $this->msleep($msleep); # ms
            $condition = $callback($condition, $this);
        }

    }

}