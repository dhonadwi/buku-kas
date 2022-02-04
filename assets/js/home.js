// const berhasil = (data) => {
//   console.log(data);
// };

const chartData = (datas) => {
  const tmp = [];
  datas.map(async (d) => {
    await tmp.push(d.saldo_pemasukan);
  });
  // console.log(tmp);
  return tmp;
};

// const getData = async () => {
//   try {
//     const data = await fetch("http://localhost:8080/kas/api_home.php");
//     const result = await data.json();
//     return result;
//   } catch (error) {
//     console.log(error);
//   }
// };

async function getData() {
  const data = await fetch("http://localhost:8080/kas/api_home.php");
  const result = await data.json();
  return result.result;
  // chartData(result.result);
}

const data = async () => {
  const data = await getData();
  const tmp = [];
  data.map(async (d) => {
    await tmp.push(d.saldo_pemasukan);
  });
  console.log(tmp);
  // return tmp;

  // console.log(data);
};
data();
// getData();
