import React, { useReducer } from "react";
import * as TYPES from "./types";

const AlertContext = React.createContext();

const AlertState = (props) => {
  const initialState = null;

  const [state, dispatch] = useReducer(AlertReducer, initialState);

  const setAlert = (message, type) => {
    dispatch({ type: TYPES.SET_ALERT, payload: { message, type } });
  };

  setTimeout(() => {
    dispatch({ type: TYPES.REMOVE_ALERT });
  }, 5000);

  return (
    <AlertContext.Provider value={{ alert: state, setAlert }}>
      {props.children}
    </AlertContext.Provider>
  );
};

const AlertReducer = (state, action) => {
  switch (action.type) {
    case TYPES.SET_ALERT:
      return action.payload;
    case TYPES.REMOVE_ALERT:
      return null;
    default:
      return state;
  }
};

export { AlertState, AlertContext };
