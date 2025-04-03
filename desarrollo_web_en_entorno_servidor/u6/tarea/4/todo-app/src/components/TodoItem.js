function TodoItem({ index, todo, onRemove }) {
	return (
		<li>
			{todo}
			<button onClick={() => onRemove(index)}>Eliminar</button>
		</li>
	);
}

export default TodoItem;
