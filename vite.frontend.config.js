import { v4wp } from "@kucrut/vite-for-wp";
import react from "@vitejs/plugin-react";
import path from "path"

// Custom plugin to handle CORS preflight requests
const corsPlugin = () => {
  return {
    name: "cors-plugin",
    configureServer(server) {
      server.middlewares.use((req, res, next) => {
        // Set CORS headers for all requests
        res.setHeader("Access-Control-Allow-Origin", "*");
        res.setHeader("Access-Control-Allow-Methods", "GET, POST, PUT, DELETE, OPTIONS, HEAD, PATCH");
        res.setHeader("Access-Control-Allow-Headers", "*");
        res.setHeader("Access-Control-Allow-Credentials", "true");
        res.setHeader("Access-Control-Expose-Headers", "*");
        res.setHeader("Access-Control-Max-Age", "86400");

        // Handle preflight requests
        if (req.method === "OPTIONS") {
          res.writeHead(200);
          res.end();
          return;
        }

        next();
      });
    },
  };
};

export default {
  plugins: [
    corsPlugin(),
    v4wp({
      input: "src/frontend/main.jsx",
      outDir: "assets/frontend/dist",
    }),
    // wp_scripts(),
    react(),
  ],
  resolve: {
    alias: {
      "@": path.resolve(__dirname, "./src"),
    },
  },
  server: {
    cors: true,
    origin: "*",
    strictPort: false,
    hmr: {
      protocol: "http",
      host: "localhost",
      port: 5173,
    },
    headers: {
      "Access-Control-Allow-Origin": "*",
      "Access-Control-Allow-Methods": "GET, POST, PUT, DELETE, OPTIONS, HEAD",
      "Access-Control-Allow-Headers": "*",
      "Access-Control-Allow-Credentials": "true",
      "Access-Control-Expose-Headers": "*",
    },
    middlewareMode: false,
    fs: {
      strict: false,
      allow: [".."],
    },
  },
};
