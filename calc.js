var wynik=0, op=0, nowe=0, nowe2=0, done=1, oset=0, kropka, temp;
function reset(value)
{
document.calc.ekran.value = value;
wynik = 0,
op = 0,
nowe = 0,
nowe2 = 0;
done = 1;
oset = 0;
}
function wspolna(new_temp)
{
kropka = 1;
if(nowe || done) {
nowe = 0;
done = 0;
temp = new_temp;
}
for(var i=0; i<temp.length; i++) if (temp[i]=='.') kropka=0;
}
function button(ktory,ktory2)
{
temp = document.calc.ekran.value;
if(ktory2=='.') {
wspolna('0');
if(kropka) {
temp += ktory2;
document.calc.ekran.value = temp;
oset = 0;
}
}
if(ktory>=0 && ktory<=9) {
wspolna('');
if(temp==0 && kropka==1) temp='';
temp += ktory;
document.calc.ekran.value = temp;
oset = 1;
}
if(ktory2=='-' || ktory2=='+' || ktory2=='/' || ktory2=='*') {
if(nowe) op = ktory2
else {
if(!nowe2) {
op = ktory2;
wynik = temp;
nowe2=1;
}
else {
wynik = eval(wynik + op + temp);
op = ktory2;
document.calc.ekran.value = wynik;
}
oset=0;
nowe = 1;
}
}
if(ktory2=='1/x' ) { wynik = eval(1 / temp) ; reset(wynik); }
if(ktory2=='sqrt') { wynik = Math.sqrt(temp); reset(wynik); }
if(ktory2=='exp' ) { wynik = Math.exp(temp) ; reset(wynik); }
if(ktory2=='+/-') document.calc.ekran.value = eval(-temp);
if(ktory2=='=' && oset && op!='0') reset(eval(wynik + op + temp));
if (ktory2=='C') reset(0);
if(document.calc.ekran.value[0] == '.')
document.calc.ekran.value = '0' + document.calc.ekran.value;
}