import { useState } from "react";

function TodoInput({ onAddTodo }) {
	const [task, setTask] = useState("");

	const handleAddClick = () => {
		if (task.trim() !== "") {
			onAddTodo(task);
			setTask("");
		}
	};

	return (
		<div className="todo-input">
			<input
				type="text"
				placeholder="Añade una nueva tarea"
				value={task}
				onChange={(e) => setTask(e.target.value)}
			/>
			<button onClick={handleAddClick}>Añadir</button>
		</div>
	);
}

export default TodoInput;
