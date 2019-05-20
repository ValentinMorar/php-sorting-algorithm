# php-sorting-algorithm
VM sorting algorithm - very fast sorting algorithm


This algorithm make no value comparison. Instead I used a sorting table and an already indexed array for sorting string values. 
Travers the array, each value of the array, character by character. Now place the values base on current character (on their value coresponding in the sorted table) in the generated indexed array.
When the character are the same, the value in the indexed array will be also in array containing values that have same character on a giving position. Starting over, till will be no more character in the current value, will automated order the values in the array. 
When a value has no more character,  this value is placed in final sorted array.


