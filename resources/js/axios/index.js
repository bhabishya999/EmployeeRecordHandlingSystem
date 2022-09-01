

import axios from 'axios';

 const HTTP = axios.create({
  baseURL: process.env.API_URL,
  headers: {
    Authorization: 'Bearer {token}'
  }
})
export default HTTP;