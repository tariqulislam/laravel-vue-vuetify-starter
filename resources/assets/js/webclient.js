import axios from 'axios'

export const WebClient = () => {
   // const token = document.head.querySelector('meta[name="csrf-token"]');
    return axios.create({
        baseURL: 'http://localhost:8000/api',
        withCredentials: false,
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
}

export default WebClient;

