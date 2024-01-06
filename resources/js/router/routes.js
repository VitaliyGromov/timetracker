import tasks from "./routes/tasks.js";
import auth from "./routes/auth.js";
import projects from "./routes/projects.js";

const routes = [
    ...projects,
    ...auth,
    ...tasks
]

export default routes;
