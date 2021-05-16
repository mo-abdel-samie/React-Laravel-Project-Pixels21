import React, { useReducer } from "react";
import axios from "axios";

import * as TYPES from "./types";

const CoursesContext = React.createContext();

const CoursesState = (props) => {
  const initialState = {
    loading: false,
    categories: ['All', 'Cs'],
    courses: [],
    course: {},
  };

  const [state, dispatch] = useReducer(courseReducer, initialState);

  const getCategories = async () => {
    dispatch({ type: TYPES.SET_LOADING });
    let { data } = await axios.get(`/categories`).catch((err)=>{console.log("Error: ", err);});
    console.log("categories");
    console.log(data.categories);
    dispatch({ type: TYPES.GET_CATEGORIES, payload: data.categories });
  }
  const getCategoryCourses = async (category) => {
    dispatch({ type: TYPES.SET_LOADING });
    let { data } = await axios.get(`/courses/${category}`).catch((err)=>{console.log("Error: ", err);});
    console.log("courses");
    console.log(data.courses);
    dispatch({ type: TYPES.GET_CATEGORY_COURSES, payload: data.courses });
  };
  const getCourseById = async (id) => {
    dispatch({ type: TYPES.SET_LOADING });
    let { data } = await axios.get(`/courses/get-course-byId/${id}`).catch((err)=>{console.log("Error: ", err);});
    console.log("course");
    console.log(data.course);
    dispatch({ type: TYPES.GET_COURSE_BY_ID, payload: data.course });
  };


  return (
    <CoursesContext.Provider
      value={{
        categories: state.categories,
        courses: state.courses,
        course: state.course,
        loading: state.loading,
        getCategories,
        getCategoryCourses,
        getCourseById,
      }}
    >
      {props.children}
    </CoursesContext.Provider>
  );
};

const courseReducer = (state, action) => {
  switch (action.type) {
    case TYPES.SET_LOADING:
      return { 
        ...state, 
        loading: true 
      };
    case TYPES.GET_CATEGORIES:
      return {
        ...state,
        categories: action.payload ? action.payload : [],
        loading: false,
      };
    case TYPES.GET_CATEGORY_COURSES:
      return {
        ...state,
        courses: action.payload ? action.payload : [],
        loading: false,
      };
    case TYPES.GET_COURSE_BY_ID:
      return {
        ...state,
        course: action.payload ? action.payload : {},
        loading: false,
      };
    default:
      return state;
  }
};

export { CoursesContext, CoursesState };