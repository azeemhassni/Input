<?php namespace Azi;

class Input
{

    /**
     * @param $key
     * @param bool $xss_clean
     * @return array|string
     */
    public static function post( $key, $xss_clean = true )
    {

        if ($xss_clean) {
            return self::clean($_POST[ $key ]);
        }

        return $_POST[ $key ];
    }

    /**
     * @param $key
     * @param bool $xss_clean
     * @return array|string
     */
    public static function get( $key, $xss_clean = true )
    {
        if ($xss_clean) {
            return self::clean($_GET[ $key ]);
        }
        return $_GET[ $key ];
    }

    /**
     * @param $key
     * @param bool $xss_clean
     * @return mixed
     */
    public static function request( $key, $xss_clean = true )
    {
        if ($xss_clean) {
            return self::clean($_REQUEST[ $key ]);
        }

        return $_REQUEST[ $key ];
    }

    /**
     * @param string $method
     * @param $xss_clean
     * @return array|string
     */
    public function all( $method = "request", $xss_clean = true)
    {
        switch ($method) {
            case "post":
                return $xss_clean ? self::clean($_POST) : $_POST;
                break;
            case "get":
                return $xss_clean ? self::clean($_GET) : $_GET;
                break;
            default:
                return $xss_clean ? self::clean($_REQUEST) : $_REQUEST;
        }
    }

    /**
     * @param $var
     * @return array|string
     */
    private static function clean( $var )
    {
        if (is_array($var)) {
            return array_map(function ( $value ) {
                return strip_tags($value);
            }, $var);
        }

        return strip_tags($var);
    }

    /**
     * @param $key
     * @return bool
     */
    public static function exists( $key )
    {
        return isset( $_REQUEST[ $key ] );
    }

}
