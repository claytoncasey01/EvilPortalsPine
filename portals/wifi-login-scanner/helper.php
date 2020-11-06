<?php

/**
 * getClientMac
 * Gets the mac address of a client by the IP address
 * Returns the mac address as a string
 * @param $clientIP : The clients IP address
 * @return string
 */
function getClientMac($clientIP)
{
    return trim(exec("grep " . escapeshellarg($clientIP) . " /tmp/dhcp.leases | awk '{print $2}'"));
}

/**
 * getClientSSID
 * Gets the SSID a client is associated by the IP address
 * Returns the SSID as a string
 * @param $clientIP : The clients IP address
 * @return string
 */
function getClientSSID($clientIP)
{
    if (file_exists("/tmp/log.db"))
    {

        // Get the clients mac address. We need this to get the SSID
        $mac = strtoupper(getClientMac($clientIP));

        $db = new SQLite3("/tmp/log.db");
        $results = $db->query("select ssid from log WHERE mac = '{$mac}' AND log_type = 0 ORDER BY updated_at DESC LIMIT 1;");
        $ssid = $results.fecth;
        while($row = $results->fetchArray())
        {
            $ssid = $row['ssid'];
            break;
        }
        $db->close();
        return $ssid;
    }

    return '';
}

/**
 * getAllSSIDs
 * Gets all of the SSIDS currently available.
 * @return string
 */
function getAllSSIDs()
{
    if (file_exists("/tmp/log.db"))
    {
        $db = new SQLite3("/tmp/log.db");
        $results = $db->query("select ssid from log WHERE log_type = 0 ORDER BY updated_at DESC LIMIT 1;");
        $ssids = '';
        while($row = $results->fetchArray())
        {
            $ssids = $row['ssid'];
            break;
        }
        $db->close();
        return $ssids;
    }

    return '';
}

/**
 * getClientHostName
 * Gets the host name of the connected client by the IP address
 * Returns the host name as a string
 * @param $clientIP : The clients IP address
 * @return string
 */
function getClientHostName($clientIP)
{
    return trim(exec("grep " . escapeshellarg($clientIP) . " /tmp/dhcp.leases | awk '{print $4}'"));
}
