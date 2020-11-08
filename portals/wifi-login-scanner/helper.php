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
        $ssid = '';
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
 * Gets all of the distnict SSIDs avaiable.
 * Returns an array of the SSIDs
 * @param $targetSSID : The SSID the target is trying to connect to.
 * @param $max : The max amount of SSIDs to fetch from the DB.
 * @return array
 */
function getAllSSIDs($targetSSID, $max = 10)
{
    if (file_exists("/tmp/log.db"))
    {
        $adjustedMax = $max - 1; // Account for adding the targetSSID
        $db = new SQLite3("/tmp/log.db");
        $results = $db->query("select DISTINCT ssid from log WHERE log_type = 0 AND ssid != '{$targetSSID}' ORDER BY updated_at DESC LIMIT {$adjustedMax};");
        $ssids = [];
        while($row = $results->fetchArray())
        {
            $networkObj = createNetworkObject($row['ssid'], true, rand(88, 66) * -1);
            array_push($ssids, $networkObj);
        }
            // Add the target SSID to the beginning of the array
            $targetNetworkObj = createNetworkObject($targetSSID, true, 0);
            array_unshift($ssids, $targetNetworkObj);
        $db->close();
        return json_encode($ssids);
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

function createNetworkObject($ssid, $auth, $rssi) {
    $obj = new stdClass;
    $obj->ssid = $ssid;
    $obj->auth = $auth;
    $obj->rssi = $rssi;

    return $obj;
}
