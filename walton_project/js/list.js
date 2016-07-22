
function fillCategory(){ 
 // this function is used to fill the category list on load
addOption(document.drop_list.Category, "Refrigerator & Freezer", "Refrigerator & Freezer", "");
addOption(document.drop_list.Category, "Television & Home Video", "Television & Home Video", "");
addOption(document.drop_list.Category, "Mobile", "Mobile", "");
addOption(document.drop_list.Category, "Motorcycle", "Motorcycle", "");
addOption(document.drop_list.Category, "Air Conditioner", "Air Conditioner", "");
addOption(document.drop_list.Category, "Generator", "Generator", "");
addOption(document.drop_list.Category, "Home and Kitchen Appliances", "Home and Kitchen Appliances", "");
}

function SelectSubCat(){
// ON selection of category this function will work

removeAllOptions(document.drop_list.SubCategory);
addOption(document.drop_list.SubCategory, "", "SubCategory", "");

if(document.drop_list.Category.value == 'Refrigerator & Freezer'){
addOption(document.drop_list.SubCategory,"Refrigerator", "Refrigerator");
addOption(document.drop_list.SubCategory,"Freezer", "Freezer");

}
if(document.drop_list.Category.value == 'Television & Home Video'){
addOption(document.drop_list.SubCategory,"SMART TV", "SMART TV");
addOption(document.drop_list.SubCategory,"LED Television", "LED Television");
addOption(document.drop_list.SubCategory,"CRT Television", "CRT Television", "");
addOption(document.drop_list.SubCategory,"DVD Player", "DVD Player", "");
}
if(document.drop_list.Category.value == 'Mobile'){
addOption(document.drop_list.SubCategory,"Smart Phone", "Smart Phone");
addOption(document.drop_list.SubCategory,"Walpad", "Walpad");
addOption(document.drop_list.SubCategory,"Feature Phone", "Feature Phone");
addOption(document.drop_list.SubCategory,"Accessories", "Accessories");
}
if(document.drop_list.Category.value == 'Motorcycle'){
addOption(document.drop_list.SubCategory,"Xplore", "Xplore");
addOption(document.drop_list.SubCategory,"Fusion", "Fusion");
addOption(document.drop_list.SubCategory,"Cruize", "Cruize");
addOption(document.drop_list.SubCategory,"Prizm", "Prizm");
addOption(document.drop_list.SubCategory,"Ranger", "Ranger");
addOption(document.drop_list.SubCategory,"Stylex", "Stylex");
addOption(document.drop_list.SubCategory,"LEO", "LEO");
}
if(document.drop_list.Category.value == 'Air Conditioner'){
addOption(document.drop_list.SubCategory,"Air Conditioner", "Air Conditioner");
}
if(document.drop_list.Category.value == 'Generator'){
addOption(document.drop_list.SubCategory,"Diesel Generator", "Diesel Generator");
addOption(document.drop_list.SubCategory,"Gasoline Generator", "Gasoline Generator");
}
if(document.drop_list.Category.value == 'Home and Kitchen Appliances'){
addOption(document.drop_list.SubCategory,"Washing Machine", "Washing Machine");
addOption(document.drop_list.SubCategory,"Electric and  Microwave oven", "Electric and  Microwave oven");
addOption(document.drop_list.SubCategory,"Sewing Machine", "Sewing Machine");
addOption(document.drop_list.SubCategory,"Blender and Juicer", "Blender and Juicer");
addOption(document.drop_list.SubCategory,"Gas stove", "Gas stove");
addOption(document.drop_list.SubCategory,"Kitchen Cookware", "Kitchen Cookware");
addOption(document.drop_list.SubCategory,"MOP Set", "MOP Set");
addOption(document.drop_list.SubCategory,"Electric kettle", "Electric kettle");
addOption(document.drop_list.SubCategory,"Food Processor", "Food Processor");
addOption(document.drop_list.SubCategory,"Electric Pressure Cooker", "Electric Pressure Cooker");
addOption(document.drop_list.SubCategory,"Iron & Cloth Dryer", "Iron & Cloth Dryer");
addOption(document.drop_list.SubCategory,"Toaster & Sandwich Maker", "Toaster & Sandwich Maker");
addOption(document.drop_list.SubCategory,"Stabilizer & IPS", "Stabilizer & IPS");
addOption(document.drop_list.SubCategory,"Electric Rice Cooker", "Electric Rice Cooker");
addOption(document.drop_list.SubCategory,"Induction Cooker", "Induction Cooker");
addOption(document.drop_list.SubCategory,"Fan and Cooler", "Fan and Cooler");
addOption(document.drop_list.SubCategory,"Vacuum Flask", "Vacuum Flask");
addOption(document.drop_list.SubCategory,"Weight Machine", "Weight Machine");
addOption(document.drop_list.SubCategory,"Hair Dryer & Straightener", "Hair Dryer & Straightener");
addOption(document.drop_list.SubCategory,"Rechargable Lamp & LED Bulb", "Rechargable Lamp & LED Bulb");
addOption(document.drop_list.SubCategory,"Water Dispenser", "Water Dispenser");
}

}


function removeAllOptions(selectbox)
{
	var i;
	for(i=selectbox.options.length-1;i>=0;i--)
	{
		//selectbox.options.remove(i);
		selectbox.remove(i);
	}
}


function addOption(selectbox, value, text )
{
	var optn = document.createElement("OPTION");
	optn.text = text;
	optn.value = value;

	selectbox.options.add(optn);
}
