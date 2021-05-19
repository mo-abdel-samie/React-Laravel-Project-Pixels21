import React, { useReducer } from "react";
import {Api} from "../Api";

import * as TYPES from "./types";

const CMSContext = React.createContext();

const CMSState = (props) => {
  const initialState = {
    loading: false,
    home_content: [],
    about_content: [],
    courses_content: [],
    blogs_content: [],
    projects_content: [],
    events_content: [],
    socials_content: [],
    footer_content: [],
  };

  const [state, dispatch] = useReducer(cmsReducer, initialState);

  const getHomeContent = async () => {
    dispatch({ type: TYPES.SET_LOADING });
    const { data } = await Api.get(`/cms/home`).catch((err)=>{console.log("Error: ", err);});
    console.log(data.home_content);
    dispatch({ type: TYPES.GET_ALL_BLOGS, payload: data.home_content });
  };

  const getAboutContent = async () => {
    dispatch({ type: TYPES.SET_LOADING });
    const { data } = await Api.get(`/cms/about`).catch((err)=>{console.log("Error: ", err);});
    console.log(data.about_content);
    dispatch({ type: TYPES.GET_ALL_BLOGS, payload: data.about_content });
  };

  const getCoursesContent = async () => {
    dispatch({ type: TYPES.SET_LOADING });
    const { data } = await Api.get(`/cms/courses`).catch((err)=>{console.log("Error: ", err);});
    console.log(data.courses_content);
    dispatch({ type: TYPES.GET_ALL_BLOGS, payload: data.courses_content });
  };
  
  const getBlogsContent = async () => {
    dispatch({ type: TYPES.SET_LOADING });
    const { data } = await Api.get(`/cms/blogs`).catch((err)=>{console.log("Error: ", err);});
    console.log(data.blogs_content);
    dispatch({ type: TYPES.GET_ALL_BLOGS, payload: data.blogs_content });
  };

  const getProjectsContent = async () => {
    dispatch({ type: TYPES.SET_LOADING });
    const { data } = await Api.get(`/cms/projects`).catch((err)=>{console.log("Error: ", err);});
    console.log(data.projects_content);
    dispatch({ type: TYPES.GET_ALL_BLOGS, payload: data.projects_content });
  };

  const getEventsContent = async () => {
    dispatch({ type: TYPES.SET_LOADING });
    const { data } = await Api.get(`/cms/events`).catch((err)=>{console.log("Error: ", err);});
    console.log(data.events_content);
    dispatch({ type: TYPES.GET_ALL_BLOGS, payload: data.events_content });
  };

  const getSocialsContent = async () => {
    dispatch({ type: TYPES.SET_LOADING });
    const { data } = await Api.get(`/cms/socials`).catch((err)=>{console.log("Error: ", err);});
    console.log(data.socials_content);
    dispatch({ type: TYPES.GET_ALL_BLOGS, payload: data.socials_content });
  };

  const getFooterContent = async () => {
    dispatch({ type: TYPES.SET_LOADING });
    const { data } = await Api.get(`/cms/footer`).catch((err)=>{console.log("Error: ", err);});
    console.log(data.footer_content);
    dispatch({ type: TYPES.GET_ALL_BLOGS, payload: data.footer_content });
  };

  return (
    <CMSContext.Provider
      value={{
        blogs: state.blogs,
        blog: state.blog,
        loading: state.loading,
        getHomeContent,
        
      }}
    >
      {props.children}
    </CMSContext.Provider>
  );
};

const cmsReducer = (state, action) => {
  switch (action.type) {
    case TYPES.SET_LOADING:
      return { 
        ...state, 
        loading: true 
      };
    case TYPES.GET_HOME_CONTENT:
      return { 
        ...state, 
        home_content: state.home_content,
        loading: true 
      };
    case TYPES.GET_ABOUT_CONTENT:
      return { 
        ...state, 
        about_content: state.about_content,
        loading: true 
      };
    case TYPES.GET_COURSES_CONTENT:
      return { 
        ...state, 
        courses_content: state.courses_content,
        loading: true 
      };
    case TYPES.GET_BLOGS_CONTENT:
      return { 
        ...state, 
        blogs_content: state.blogs_content,
        loading: true 
      };
    case TYPES.GET_PROJECTS_CONTENT:
      return { 
        ...state, 
        projects_content: state.projects_content,
        loading: true 
      };
    case TYPES.GET_EVENTS_CONTENT:
      return { 
        ...state, 
        events_content: state.events_content,
        loading: true 
      };
    case TYPES.GET_SOCIALS_CONTENT:
      return { 
        ...state, 
        socials_content: state.socials_content,
        loading: true 
      };
    case TYPES.GET_FOOTER_CONTENT:
      return { 
        ...state, 
        footer_content: state.footer_content,
        loading: true, 
      };
    default:
      return state;
  }
};

export { CMSContext, CMSState };