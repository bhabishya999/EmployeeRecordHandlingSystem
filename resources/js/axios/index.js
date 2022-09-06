import axios from 'axios';

const token = localStorage.getItem("talent_token") ?? "";
 
  const axiosInstance = axios.create({
  baseURL: `http://talent.local/api`,
  headers: {
    Authorization: `Bearer ${token}`
  }
})

export default axiosInstance;