import { config } from "dotenv";
import { resolve } from "path";

config({ path: resolve(__dirname, "..", ".env.example") });

export const SERVER_PORT = Number(process.env.SERVER_PORT);
