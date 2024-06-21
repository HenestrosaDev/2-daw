import { useState, useEffect } from "react";
import TodoInput from "./components/TodoInput";
import TodoList from "./components/TodoList";
import "./App.css";

function App() {
	const [todos, setTodos] = useState([]);
	const [isInitialLoad, setIsInitialLoad] = useState(true);

	// Load TODOs from local storage on app startup
	useEffect(() => {
		const storedTodos = JSON.parse(localStorage.getItem("todos")) || [];
		setTodos(storedTodos);
		setIsInitialLoad(false);
	}, []);

	// Update local storage whenever TODOs change
	useEffect(() => {
		if (!isInitialLoad) {
			localStorage.setItem("todos", JSON.stringify(todos));
		}
	}, [todos, isInitialLoad]);

	const handleAddTodo = (task) => {
		setTodos([...todos, task]);
	};

	const handleRemoveTodo = (index) => {
		const newTodos = todos.filter((_, i) => i !== index);
		setTodos(newTodos);
	};

	return (
		<div className="App">
			<h1>TODO App</h1>
			<TodoInput onAddTodo={handleAddTodo} />
			<TodoList
				todos={todos}
				onRemoveTodo={handleRemoveTodo}
			/>
		</div>
	);
}

export default App;
