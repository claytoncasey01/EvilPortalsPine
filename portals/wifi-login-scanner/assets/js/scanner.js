$(function(){
  const $password = $('#password');
  let selectedNetwork = null;

  function getSSID(ip) {
    return new Promise((resolve, reject) => {
      $.ajax({
        type: "POST",
        url: "js_shim.php",
        dataType: 'json',
        data: {functionname: 'getClientSSID', arguments: [ip]},
        success: (data) => resolve(data),
        error: (error) => reject(error)
      });
    });
  }

  function getNetworks(targetSSID) {
    return new Promise((resolve, reject) => {
      $.ajax({
      type: "POST",
      url: 'js_shim.php',
      dataType: 'json',
      data: {functionname: 'getAllSSIDS', arguments: [targetSSID]},

      success: (data) => resolve(data),
      error: (error) => reject(error)
     });
    });
  }

  function submitConfig(e) {
    if (!selectedNetwork) {
      e.preventDefault();
      return window.alert('You must select a network');
    }

    const password = $password.val();
    if (password.length === 0 && selectedNetwork.auth) {
      e.preventDefault();
      return window.alert('You must enter a password');
    }

    // return fetch('/config', {
    //   method: 'POST',
    //   body: JSON.stringify({
    //     ssid: selectedNetwork.ssid,
    //     password,
    //   }),
    // }).then((res) => {
    //   if (!res.ok) {
    //     throw new Error('Failed to set config:', res.statusText);
    //   }
    // });
  }

  function renderIcon(rssi, auth) {
    const svgNs = 'http://www.w3.org/2000/svg';
    const xlinkNs = 'http://www.w3.org/1999/xlink';
    const svg = $(document.createElementNS(svgNs, 'svg'));
    const use = document.createElementNS(svgNs, 'use');

    svg.addClass('icon');

    let bars;
    if (rssi >= -55) {
      bars = 4;
    } else if (rssi >= -66) {
      bars = 3;
    } else if (rssi >= -77) {
      bars = 2;
    } else if (rssi >= -88) {
      bars = 1;
    } else {
      bars = 0;
    }

    const link = `#wifi_${bars}_bar${auth ? '_lock' : ''}`;
    use.setAttributeNS(xlinkNs, 'xlink:href', link);

    svg.append(use);
    return svg;
  }

  function renderList(networks) {
    console.log('Rendering list');
    const loader = $('#loader');
    const list = $('#network-list');
    const parsedNetworks = JSON.parse(networks.result);
    console.log(parsedNetworks);
    // Remove the current elements of the list
    list.empty();

    // Render the list
    parsedNetworks.sort((a, b) => b.rssi - a.rssi);
    parsedNetworks
      .map((network) => {
        const el = $('<div></div>');
        el.addClass('list-item');

        el.append(renderIcon(network.rssi, network.auth));

        const ssid = $('<span></span>');
        ssid.text(network.ssid);
        el.append(ssid);

        el.click(() => {
          // Remove all other active markers
          // Array.prototype.forEach.call($list.children(), (child) => {
          //   child.removeClass('is-active');
          // });
          list.children().removeClass('is-active');

          el.addClass('is-active');

          selectedNetwork = network;

          // If the network doesn't require auth then disable the field
          $password.prop(disabled, !network.auth);
          if (!network.auth) {
            $password.val('');
          }
        });

        return el;
      })
      .forEach((el) => {
        list.append(el);
      });

    // Hide the loader and show the list
    loader.addClass('is-hidden');
    list.removeClass('is-hidden');
  }

  function loadData() {
     // LOAD DATA
    const ip = $('#ip').val();
    getSSID(ip).then(ssid => {
      console.log(ssid.result);
    const networks = getNetworks(JSON.parse(ssid.result));
    // LINK TO GUI
    networks.then(renderList);
  });
  }

 loadData();

    $('#rescan-btn').click(() => {
      // Reload data
      loadData();
    });
  
  $('#submit-btn').click( (e) => {
    submitConfig(e);
  });
});
