import React from 'react'
import Courses from './Components/Courses';
import Instructors from './Components/Instructors';
import Header from './Components/Header';
import './CoursesStyles.css';


const CoursesPage = () => {
  return (
    <>
      <Header />  
      <Courses />
      <Instructors />
    </>
  )
}

export default CoursesPage
