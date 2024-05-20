import { HttpService } from "@/services/HttpService";

export const AuthService = {
  async sendPasswordResetEmail(email) {
    await HttpService.post("/home/forgot-password", {
      email,
    })
      .then((reseponse) => {
        return reseponse.data;
      })
      .catch((error) => {
        throw error;
      });
  },
  async resetPassword(email, token, password, password_confirmation) {
    await HttpService.post("/home/reset-password", {
      email,
      token,
      password,
      password_confirmation,
    })
      .then((response) => {
        return response.data;
      })
      .catch((error) => {
        throw error;
      });
  },
};
