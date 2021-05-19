import React, { useReducer } from "react";
import {Api} from "../Api";

import * as TYPES from "./types";

const ProjectsContext = React.createContext();

const ProjectsState = (props) => {
  const initialState = {
    loading: false,
    projects: [],
    project: {},
  };

  const [state, dispatch] = useReducer(projectReducer, initialState);

  const getAllProjects = async () => {
    dispatch({ type: TYPES.SET_LOADING });
    const { data } = await Api.get(`/projects`);
    console.log(data);
    dispatch({ type: TYPES.GET_ALL_PROJECTS, payload: data });
  };
  const getProjectById = async (id) => {
    dispatch({ type: TYPES.SET_LOADING });
    const { data } = await Api.get(`/projects/get-project-byId/${id}`);
    console.log(data);
    dispatch({ type: TYPES.GET_PROJECT_BY_ID, payload: data });
  };


  return (
    <ProjectsContext.Provider
      value={{
        projects: state.projects,
        project: state.project,
        loading: state.loading,
        getAllProjects,
        getProjectById,
      }}
    >
      {props.children}
    </ProjectsContext.Provider>
  );
};

const projectReducer = (state, action) => {
  switch (action.type) {
    case TYPES.SET_LOADING:
      return { 
        ...state, 
        loading: true 
      };
    
    case TYPES.GET_ALL_PROJECTS:
      return {
        ...state,
        projects: action.payload ? action.payload : [],
        loading: false,
      };
    case TYPES.GET_PROJECT_BY_ID:
      return {
        ...state,
        project: action.payload ? action.payload : {},
        loading: false,
      };
    default:
      return state;
  }
};

export { ProjectsContext, ProjectsState };