import axios from 'axios'

export const WebClient = () => {
   // const token = document.head.querySelector('meta[name="csrf-token"]');
    return axios.create({
        baseURL: '/api',
        withCredentials: false,
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
}

export default WebClient;

