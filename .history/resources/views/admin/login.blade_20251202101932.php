// Simpan ke localStorage
localStorage.setItem('menuData', JSON.stringify(menuData));

// Load dari localStorage
menuData = JSON.parse(localStorage.getItem('menuData')) || defaultData;