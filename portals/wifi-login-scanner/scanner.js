(function () {
  const $password = document.getElementById('password');
  let selectedNetwork = null;

  function getNetworks() {
    const ssidList = document.getElementById('ssid-list');
    console.log(ssidList);

    return Promise.resolve([
      {
        ssid: 'test',
        rssi: -60,
        auth: true,
      },
      {
        ssid: 'test',
        rssi: -60,
        auth: false,
      },
    ]);

    return fetch('/aps').then((res) => {
      if (!res.ok) {
        throw new Error('Failed to fetch APs:', res.statusText);
      }

      return res.json();
    });
  }

  function submitConfig() {
    if (!selectedNetwork) {
      return window.alert('You must select a network');
    }

    const password = $password.value;
    if (password.length === 0 && selectedNetwork.auth) {
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
    const svg = document.createElementNS(svgNs, 'svg');
    const use = document.createElementNS(svgNs, 'use');

    svg.classList.add('icon');

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

    svg.appendChild(use);
    return svg;
  }

  function renderList(networks) {
    console.log('Rendering list');
    const $loader = document.getElementById('loader');
    const $list = document.getElementById('network-list');

    // Remove the current elements of the list
    while ($list.lastChild) {
      $list.removeChild($list.lastChild);
    }

    // Render the list
    networks
      .map((network) => {
        const el = document.createElement('div');
        el.classList.add('list-item');

        el.appendChild(renderIcon(network.rssi, network.auth));

        const ssid = document.createElement('span');
        ssid.innerText = network.ssid;
        el.appendChild(ssid);

        el.addEventListener('click', () => {
          // Remove all other active markers
          Array.prototype.forEach.call($list.children, (child) => {
            child.classList.remove('is-active');
          });

          el.classList.add('is-active');

          selectedNetwork = network;

          // If the network doesn't require auth then disable the field
          $password.disabled = !network.auth;
          if (!network.auth) {
            $password.value = '';
          }
        });

        return el;
      })
      .forEach((el) => {
        $list.appendChild(el);
      });

    // Hide the loader and show the list
    $loader.classList.add('is-hidden');
    $list.classList.remove('is-hidden');
  }

  // LOAD DATA

  const networks = getNetworks();

  // LINK TO GUI

  networks.then(renderList);

  document.getElementById('submit-btn').addEventListener('click', (event) => {
    submitConfig();
  });
})();
