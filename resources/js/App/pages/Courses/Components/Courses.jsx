import React, { useState } from 'react';
import { Container } from 'react-bootstrap';
import { NavLink } from 'react-router-dom';
import CoursesItem from '../../../Components/CoursesItem';


const Courses = () => {

  const [coursesCategory, setCoursesCategory] = useState('all');
  const coursesCategories = ['all', 'CS', 'Power', 'Mechanics'];
  const categoryHandler = (category) => {
    setCoursesCategory(category);
  }  

  return (
    <section className="courses py">
      <Container>
        <h2 className="courses-title text-center">Unlimited access to more than 1600 courses</h2>
        
        <ul className="nav my-4 justify-content-center">
          {coursesCategories.map((category, index)=> {
            return (
              <li key={index} className="nav-item mx-2">
                <NavLink to={"/courses/"+category} onClick={()=>categoryHandler(category)} activeClassName="active" className="course-tab text-center d-inline-block rounded-circle">{category}</NavLink>
              </li>
            );
          })}
        </ul>

        <CoursesItem coursesCategory={coursesCategory}/>
      </Container>
    </section>
  )
}

export default Courses
