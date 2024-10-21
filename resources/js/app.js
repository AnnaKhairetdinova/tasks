import './bootstrap';
import ujs from '@rails/ujs';
ujs.start();

const select = document.getElementById('status');
const selectedValue = select.value;

async function myFunction() {
    const params = new URLSearchParams({ status: selectedValue }).toString();
    const response = await fetch(`http://127.0.0.1:8000/tasks?${params}`);
    return response.json();
}

const urlParams = new URLSearchParams(window.location.search);
let queryString = urlParams.get('status');

document.getElementById("status").querySelector("option[value='" + queryString + "']").selected = true;
