function uniqueElements(array) {
  const elementCounts = {};
  
  for (const element of array) {
      const stringKey = String(element);
      if (!elementCounts[stringKey]) {
          elementCounts[stringKey] = 1;
      } else {
          elementCounts[stringKey] += 1;
      }
  }
  
  return elementCounts;
}

console.log(uniqueElements(['привет', 'hello', 1, '1'])); // {'привет': 1, 'hello': 1, '1': 2}