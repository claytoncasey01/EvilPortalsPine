$(function () {
  const $password = $('#password');
  let selectedNetwork = null;

  function getSSID(ip) {
    return sendShimRequest('getClientSSID', [ip]);
  }

  function getNetworks(targetSSID) {
    return sendShimRequest('getAllSSIDS', [targetSSID]);
  }

  // Sends a request to the js_php shim
  function sendShimRequest(functionName, args) {
    return new Promise((resolve, reject) => {
      $.ajax({
        type: 'POST',
        url: 'js_shim.php',
        dataType: 'json',
        data: { functionname: functionName, arguments: args },

        success: (data) => resolve(data),
        error: (error) => reject(error),
      });
    });
  }

  function submitConfig(e) {
    // TODO: Replace these alerts with a modal
    if (!selectedNetwork) {
      e.preventDefault();
      return window.alert('You must select a network');
    }

    const password = $password.val();
    if (password.length === 0 && selectedNetwork.auth) {
      e.preventDefault();
      return window.alert('You must enter a password');
    }

    const selectedSSID = $('.is-active');
    if (targetSSID !== selectedSSID.text()) {
      e.preventDefault();
      return window.alert('Incorrect password');
    }
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
          list.children().removeClass('is-active');

          el.addClass('is-active');

          selectedNetwork = network;

          // If the network doesn't require auth then hide the field
          const passwordFieldGroup = $('.field');
          if (!network.auth) {
            passwordFieldGroup.addClass('is-hidden');
          } else {
            passwordFieldGroup.removeClass('is-hidden');
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
    getSSID(ip).then((ssid) => {
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

  $('#submit-btn').click((e) => {
    submitConfig(e);
  });
});
