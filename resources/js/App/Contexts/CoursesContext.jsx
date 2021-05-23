import React, { useReducer, useState } from "react";
import * as TYPES from "./types";
import {Api} from "../Api";

const CoursesContext = React.createContext();

const CoursesState = (props) => {
  const initialState = {
    loading: false,
    categories: [],
    courses: [],
    otherCourses: [],
    course: {},
  };

  const [state, dispatch] = useReducer(courseReducer, initialState);

  const getCategories = async () => {
    dispatch({ type: TYPES.SET_LOADING });
    let { data } = await Api.get(`/categories`).catch((err)=>{console.log("Error: ", err);});
    console.log("categories");
    console.log(data.categories);
    dispatch({ type: TYPES.GET_CATEGORIES, payload: data.categories });
  }
  const getCoursesByCategoryName = async (category) => {
    dispatch({ type: TYPES.SET_LOADING });
    let { data } = await Api.get(`/courses/category-name/${category}`).catch((err)=>{console.log("Error: ", err);});
    console.log("courses");
    console.log(data.courses);
    dispatch({ type: TYPES.GET_COURSES_BY_CATEGORY_NAME, payload: data.courses });
  };
  const getCoursesByCategoryId = async (category) => {
    dispatch({ type: TYPES.SET_LOADING });
    let { data } = await Api.get(`/courses/category-id/${category}`).catch((err)=>{console.log("Error: ", err);});
    console.log("courses");
    console.log(data.courses);
    dispatch({ type: TYPES.GET_COURSES_BY_CATEGORY_ID, payload: data.courses });
  };
  const getCourseById = async (id) => {
    dispatch({ type: TYPES.SET_LOADING });
    let { data } = await Api.get(`/courses/get-course-byId/${id}`).catch((err)=>{console.log("Error: ", err);});
    console.log("course");
    console.log(data.course);
    dispatch({ type: TYPES.GET_COURSE_BY_ID, payload: data.course });
  };

  // const [activeCategory, setActiveCategory] = useState('all')


  return (
    <CoursesContext.Provider
      value={{
        categories: state.categories,
        courses: state.courses,
        otherCourses: state.otherCourses,
        course: state.course,
        loading: state.loading,
        getCategories,
        getCoursesByCategoryName,
        getCoursesByCategoryId,
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
    case TYPES.GET_COURSES_BY_CATEGORY_NAME:
        return {
            ...state,
            courses: action.payload ? action.payload : [],
            loading: false,
        };
    case TYPES.GET_COURSES_BY_CATEGORY_ID:
      return {
        ...state,
        otherCourses: action.payload ? action.payload : [],
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
