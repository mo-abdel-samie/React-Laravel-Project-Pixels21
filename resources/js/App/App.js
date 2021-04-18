import React from 'react';
import ReactDOM from 'react-dom';
import { ToastContainer, toast } from 'react-toastify';

import 'react-toastify/dist/ReactToastify.css';
// import App from './App';

import {
    BrowserRouter as Router,
    Switch,
    Route,
    Redirect
} from "react-router-dom";


import 'bootstrap/dist/css/bootstrap.min.css';
import './App.css';
import './index.css';

  import 'aos/dist/aos.css';

  import Navbar from './Components/NavbarComponent';
  import Footer from './Components/Footer';
  import HomePage from './pages/Home/HomePage';
  import AboutPage from './pages/About/AboutPage';
  import EventsPage from './pages/EventsPage/EventsPage';
  import Magazine from './pages/Magazine/Magazine';
  import Error from './pages/Nomatched/Error';
  import Blogs from "./pages/Blogs/Blogs";
  import ProjectsContst from "./pages/projectAndCourses/ProjectsContst";

import Project from './pages/projectAndCourses/Compoments/Project';
import Blog from './pages/Blogs/Components/Blog';
import CoursesPage from './pages/Courses/CoursesPage';
import SingleCoursePage from './pages/SingleCourse/SingleCoursePage';

class App extends React.Component {
    render(){
        return (
            <Router>
                <Navbar />
                <ToastContainer />
                <Switch>
                    <Route path="/home">            <HomePage />                </Route>
                    <Route path="/about">           <AboutPage />               </Route>
                    <Route path="/project-contest"> <ProjectsContst />          </Route>
                    <Route path="/project/:id">     <Project />                 </Route>
                    <Route path="/blogs">           <Blogs />                   </Route>
                    <Route path="/blog/:id">        <Blog />                    </Route>
                    <Route path="/courses/:category">         <CoursesPage />             </Route>
                    <Route path="/course/:id">     <SingleCoursePage />        </Route>
                    <Route path="/pixels-events">   <EventsPage />              </Route>
                    <Route path="/magazine">        <Magazine />                </Route>
                    <Redirect exact from="/" to="/home" />
                    <Route >
                        <Error />
                    </Route>
                </Switch>
                <Footer />
            </Router>
        );
    }
}

ReactDOM.render(<App />, document.getElementById("root"));

