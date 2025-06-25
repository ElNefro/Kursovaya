const url = 'http://127.0.0.1:5500';

const data = { 
    username: "username",
    password: "password"
};

const jsonData = JSON.stringify(data, null, 2);

fetch(url, {
  method: 'POST',
  headers: {
    'Content-Type': 'application/json'
  },
  body: JSON.stringify(data)
})
.then(response => response.json())
.then(data => console.log(data))
.catch(error => console.error('Error:', error));