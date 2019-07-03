<?php
/**
 * @author samark chaisanguan
 * @email samarkchsngn@gmail.com
 */
namespace Lumpineevill\Generate;

class BaseGenerateFile
{
    /**
     * set host
     * @var string
     */
    private $host = '127.0.0.1';

    /**
     * set username
     * @var string
     */
    private $user = '';

    /**
     * set password
     * @var string
     */
    private $pass = '';

    /**
     * set dbname
     * @var string
     */
    private $dbname = '';

    /**
     * instance of database connection
     * @var object
     */
    private $connect;

    public function __construct()
    {
        $this->runConfig();
        $this->connectDatabase();
    }

    /**
     * [runConfig description]
     * @return [type] [description]
     */
    protected function runConfig()
    {
        $this->host = env("DB_HOST");
        $this->port = env("DB_PORT");
        $this->user = env("DB_USERNAME");
        $this->pass = env("DB_PASSWORD");
        $this->dbname = env("DB_DATABASE");
    }

    /**
     * [getColumnName description]
     * @param  [type] $table [description]
     * @return [type]        [description]
     */
    public function getColumnName($table)
    {
        $sql = "SELECT `COLUMN_NAME`
					FROM `INFORMATION_SCHEMA`.`COLUMNS`
					WHERE `TABLE_SCHEMA`='{$this->dbname}'
					    AND `TABLE_NAME`='{$table}';";
        $data = $this->connect->query($sql);
        if ($data->nun_rows > 0) {
            $respones = [];
            while ($row = $data->fetch_assoc()) {
                $respones[] = $row['COLUMNS'];
            }
            return $respones;
        }
    }

    /**
     * [connectDatabase description]
     * @return [type] [description]
     */
    protected function connectDatabase()
    {
        $this->connect = new \mysqli($this->host, $this->user, $this->pass, $this->dbname);
        if ($this->connect->connect_error) {
            die('mysqli connect error');
        }
        return $this;

    }
}
