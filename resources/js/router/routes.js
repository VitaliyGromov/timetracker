import tasks from "./routes/tasks.js";
import auth from "./routes/auth.js";
import projects from "./routes/projects.js";
import statistic from "./routes/statistic.js";

const routes = [
    ...statistic,
    ...projects,
    ...auth,
    ...tasks
]

export default routes;
