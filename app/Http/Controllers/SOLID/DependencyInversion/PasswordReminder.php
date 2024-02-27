<?php

namespace App\Http\Controllers\SOLID\DependencyInversion;


interface ConnectionInterface
{
    public function connect();

}

// Low Level Module depends on abstractions=> ConnectionInterface
class DbConnection implements ConnectionInterface
{
    public function connect()
    {
        // TODO: Implement connect() method.
    }
}

// High Level Module depends on abstractions => ConnectionInterface
class PasswordReminder
{
    private ConnectionInterface $dbConnection;

    public function __construct(ConnectionInterface $dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }

    public function reset()
    {
        return "Password reset";
    }
}
