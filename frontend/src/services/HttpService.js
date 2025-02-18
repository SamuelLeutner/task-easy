import axios from "axios";

export const HttpService = axios.create({
  baseURL: process.env.BASE_URL_BACK + "/api",
  headers: {
    "Content-type": "application/json",
  },
});

export default class API {
  static async sendDataToBackend(data) {
    const response = await HttpService.post("/home/register", data);
    return response.data;
  }
  static async createTask(post) {
    const response = await HttpService.post(`/workspace/task/`, post);
    return response.data;
  }
  static async updateTask(id, post) {
    const response = await HttpService.put(`/workspace/update/${id}`, post);
    return response.data;
  }
  static async getAllTask() {
    const response = await HttpService.get("/workspace");
    return response.data;
  }
  static async deleteTask(id) {
    const response = await HttpService.delete(`/workspace/remove/${id}`);
    return response.data;
  }
}
