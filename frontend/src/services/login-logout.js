import { HttpService } from "@/services/HttpService";

const setAuthToken = (token) => {
  if (token) {
    HttpService.defaults.headers.common["Authorization"] = `Bearer ${token}`;
  } else {
    delete HttpService.defaults.headers.common["Authorization"];
  }
};

export const login = async (email, password) => {
  const response = await HttpService.post("/home/login", { email, password });
  const token = response.data.token;
  localStorage.setItem("token", token);
  setAuthToken(token);
  return response.data.user;
};

export const logout = () => {
  localStorage.removeItem("token");
  setAuthToken(null);
};

export const checkAuthentication = async () => {
  const token = localStorage.getItem("token");
  if (token) {
    setAuthToken(token);
    const response = await HttpService.get("/user");
    return response.data;
  } else {
    throw new Error("Usuário não autenticado");
  }
};

export default {
  login,
  logout,
  checkAuthentication,
};
