import TodoItem from "./TodoItem";

function TodoList({ todos, onRemoveTodo }) {
	return (
		<ul className="todo-list">
			{todos.map((todo, index) => (
				<TodoItem
					key={index}
					index={index}
					todo={todo}
					onRemove={onRemoveTodo}
				/>
			))}
		</ul>
	);
}

export default TodoList;