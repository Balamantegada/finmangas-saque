-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01-Nov-2022 às 16:36
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `finmangas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastros1`
--

CREATE TABLE `cadastros1` (
  `id` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `senha` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `ativo` int(1) NOT NULL,
  `nivelacesso` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cadastros1`
--

INSERT INTO `cadastros1` (`id`, `usuario`, `senha`, `email`, `ativo`, `nivelacesso`) VALUES
(1, 'admin', 'admin', 'admin', 0, 'admin'),
(2, 'ber', 'ber', 'ber', 0, 'user'),
(3, 'Yaminha', '1234', 'Yaminha@gostoso.com', 0, 'user'),
(4, 'teste', 'Admin', 'asdas@gmail.com', 1, 'user'),
(5, 'teste', 'teste', 'asdas@gmail.com', 1, 'user');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidadepessoas`
--

CREATE TABLE `cidadepessoas` (
  `id_cidade` int(11) NOT NULL,
  `cidade_nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cidadepessoas`
--

INSERT INTO `cidadepessoas` (`id_cidade`, `cidade_nome`) VALUES
(1, 'Itajái');

-- --------------------------------------------------------

--
-- Estrutura da tabela `compra`
--

CREATE TABLE `compra` (
  `id_compra` int(11) NOT NULL,
  `descrisao` varchar(100) NOT NULL,
  `dataEmissao` date NOT NULL,
  `dataEntrega` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `compra`
--

INSERT INTO `compra` (`id_compra`, `descrisao`, `dataEmissao`, `dataEntrega`) VALUES
(1, 'manga', '0012-12-12', '0012-12-12');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contaspagar`
--

CREATE TABLE `contaspagar` (
  `id_contas_pagar` int(11) NOT NULL,
  `quantidadeParcelas` int(11) NOT NULL,
  `dataVencimento` date NOT NULL,
  `dataPagamento` date NOT NULL,
  `numeroParcela` int(11) NOT NULL,
  `desconto` int(11) NOT NULL,
  `juros` int(11) NOT NULL,
  `valorPago` int(11) NOT NULL,
  `valorConta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contasreceber`
--

CREATE TABLE `contasreceber` (
  `id_contas_receber` int(11) NOT NULL,
  `quantidadeParecelas` int(11) NOT NULL,
  `dataVencimento` date NOT NULL,
  `dataPagamento` date NOT NULL,
  `numeroParcela` int(11) NOT NULL,
  `desconto` int(11) NOT NULL,
  `juros` int(11) NOT NULL,
  `valorPago` int(11) NOT NULL,
  `valorConta` int(11) NOT NULL,
  `id_da_conta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `contasreceber`
--

INSERT INTO `contasreceber` (`id_contas_receber`, `quantidadeParecelas`, `dataVencimento`, `dataPagamento`, `numeroParcela`, `desconto`, `juros`, `valorPago`, `valorConta`, `id_da_conta`) VALUES
(1, 12, '1222-12-12', '2222-02-12', 12, 50, 5, 500, 100000, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `estadopessoas`
--

CREATE TABLE `estadopessoas` (
  `id_estado_db` int(11) NOT NULL,
  `estados` varchar(100) NOT NULL,
  `sigla` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `estadopessoas`
--

INSERT INTO `estadopessoas` (`id_estado_db`, `estados`, `sigla`) VALUES
(0, 'Santa Catarina', 'SC');

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupoprodutos`
--

CREATE TABLE `grupoprodutos` (
  `id_Grupo_produtos` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `grupoprodutos`
--

INSERT INTO `grupoprodutos` (`id_Grupo_produtos`, `nome`) VALUES
(1, 'Eletronicos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `itemcompra`
--

CREATE TABLE `itemcompra` (
  `id_item_compra` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `itemcompra`
--

INSERT INTO `itemcompra` (`id_item_compra`, `quantidade`, `valor`) VALUES
(1, 12, 12);

-- --------------------------------------------------------

--
-- Estrutura da tabela `itemservico`
--

CREATE TABLE `itemservico` (
  `id_item_servico` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `atribute30` int(11) NOT NULL,
  `atribute34` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `itemservico`
--

INSERT INTO `itemservico` (`id_item_servico`, `valor`, `atribute30`, `atribute34`) VALUES
(1, 500, 30, 30);

-- --------------------------------------------------------

--
-- Estrutura da tabela `itemvenda`
--

CREATE TABLE `itemvenda` (
  `id_item_venda` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `itemvenda`
--

INSERT INTO `itemvenda` (`id_item_venda`, `quantidade`, `valor`) VALUES
(1, 213123, 123123),
(2, 12, 12);

-- --------------------------------------------------------

--
-- Estrutura da tabela `marcaprodutos`
--

CREATE TABLE `marcaprodutos` (
  `id_marcaprodutos` int(11) NOT NULL,
  `nome_marca` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `marcaprodutos`
--

INSERT INTO `marcaprodutos` (`id_marcaprodutos`, `nome_marca`) VALUES
(1, 'DELL'),
(2, 'teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ordemservicodb`
--

CREATE TABLE `ordemservicodb` (
  `id_ordemservico` int(11) NOT NULL,
  `referencia` varchar(200) NOT NULL,
  `defeito` varchar(200) NOT NULL,
  `descrisao` varchar(200) NOT NULL,
  `observacao` varchar(200) NOT NULL,
  `numeroserie` varchar(200) NOT NULL,
  `equipamento` varchar(200) NOT NULL,
  `descontoservico` int(200) NOT NULL,
  `acresimoservico` int(200) NOT NULL,
  `descontoproduto` int(200) NOT NULL,
  `acresimoproduto` int(200) NOT NULL,
  `dataentradaservico` date NOT NULL,
  `horaentradaservico` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `ordemservicodb`
--

INSERT INTO `ordemservicodb` (`id_ordemservico`, `referencia`, `defeito`, `descrisao`, `observacao`, `numeroserie`, `equipamento`, `descontoservico`, `acresimoservico`, `descontoproduto`, `acresimoproduto`, `dataentradaservico`, `horaentradaservico`) VALUES
(1, '1', '1', '1', '11', '1', '11', 11, 11, 1, 11, '1111-11-11', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoasfisicas`
--

CREATE TABLE `pessoasfisicas` (
  `id_pessoa` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `telefone` varchar(25) NOT NULL,
  `situacao` char(200) NOT NULL,
  `bairro` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `cep` varchar(200) NOT NULL,
  `observacao` varchar(250) NOT NULL,
  `tipo` char(200) NOT NULL,
  `sexo` varchar(20) NOT NULL,
  `cpf` int(15) NOT NULL,
  `rg` int(30) NOT NULL,
  `dataNascimento` date NOT NULL,
  `celular` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pessoasfisicas`
--

INSERT INTO `pessoasfisicas` (`id_pessoa`, `nome`, `endereco`, `telefone`, `situacao`, `bairro`, `email`, `cep`, `observacao`, `tipo`, `sexo`, `cpf`, `rg`, `dataNascimento`, `celular`) VALUES
(1, 'Marcos Gabriel', '1', '1', '1', '11', '11', '1', '11', '11', 'outro', 1, 1, '1111-11-11', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoasjuridicas`
--

CREATE TABLE `pessoasjuridicas` (
  `id_pessoa` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `telefone` varchar(25) NOT NULL,
  `situacao` char(200) NOT NULL,
  `bairro` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `cep` varchar(200) NOT NULL,
  `observacao` varchar(250) NOT NULL,
  `tipo` char(200) NOT NULL,
  `razaosocial` varchar(250) NOT NULL,
  `cnpj` varchar(25) NOT NULL,
  `contato` varchar(200) NOT NULL,
  `incrisaosocial` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pessoasjuridicas`
--

INSERT INTO `pessoasjuridicas` (`id_pessoa`, `nome`, `endereco`, `telefone`, `situacao`, `bairro`, `email`, `cep`, `observacao`, `tipo`, `razaosocial`, `cnpj`, `contato`, `incrisaosocial`) VALUES
(0, 'Arthru', 'rua antonio', '1231', '1231', '2321', '123123', '132321', '123', '12312', '2131', '21312', '3123123', '3121');

-- --------------------------------------------------------

--
-- Estrutura da tabela `planopagamento`
--

CREATE TABLE `planopagamento` (
  `id_plano_pagamento` int(11) NOT NULL,
  `descrisao` varchar(200) NOT NULL,
  `periodoEntreParecelas` int(11) NOT NULL,
  `id_da_conta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `planopagamento`
--

INSERT INTO `planopagamento` (`id_plano_pagamento`, `descrisao`, `periodoEntreParecelas`, `id_da_conta`) VALUES
(1, '15', 15, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtosdb`
--

CREATE TABLE `produtosdb` (
  `id_produto` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `codigobarra` varchar(200) NOT NULL,
  `referencia` varchar(200) NOT NULL,
  `descrisao` varchar(200) NOT NULL,
  `estoqueminimo` int(11) NOT NULL,
  `estoquemaximo` int(11) NOT NULL,
  `precocusto` varchar(50) NOT NULL,
  `precovenda` varchar(50) NOT NULL,
  `precovendaatacado` varchar(50) NOT NULL,
  `Marca_estrangeiro` varchar(50) NOT NULL,
  `Grupo_estrangeiro` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

CREATE TABLE `servico` (
  `id_servico` int(11) NOT NULL,
  `descrisao` varchar(200) NOT NULL,
  `valor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `servico`
--

INSERT INTO `servico` (`id_servico`, `descrisao`, `valor`) VALUES
(1, 'Aqui lá', 500);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `id_vendas` int(11) NOT NULL,
  `descriscao` varchar(200) NOT NULL,
  `dataEntrega` date NOT NULL,
  `comprador` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`id_vendas`, `descriscao`, `dataEntrega`, `comprador`) VALUES
(1, 'descrisão teste', '2222-03-12', 'Marcos'),
(2, 'teste 2', '0012-03-21', '1');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cadastros1`
--
ALTER TABLE `cadastros1`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cidadepessoas`
--
ALTER TABLE `cidadepessoas`
  ADD PRIMARY KEY (`id_cidade`);

--
-- Índices para tabela `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id_compra`);

--
-- Índices para tabela `contaspagar`
--
ALTER TABLE `contaspagar`
  ADD PRIMARY KEY (`id_contas_pagar`);

--
-- Índices para tabela `contasreceber`
--
ALTER TABLE `contasreceber`
  ADD PRIMARY KEY (`id_contas_receber`);

--
-- Índices para tabela `grupoprodutos`
--
ALTER TABLE `grupoprodutos`
  ADD PRIMARY KEY (`id_Grupo_produtos`);

--
-- Índices para tabela `itemcompra`
--
ALTER TABLE `itemcompra`
  ADD PRIMARY KEY (`id_item_compra`);

--
-- Índices para tabela `itemservico`
--
ALTER TABLE `itemservico`
  ADD PRIMARY KEY (`id_item_servico`);

--
-- Índices para tabela `itemvenda`
--
ALTER TABLE `itemvenda`
  ADD PRIMARY KEY (`id_item_venda`);

--
-- Índices para tabela `marcaprodutos`
--
ALTER TABLE `marcaprodutos`
  ADD PRIMARY KEY (`id_marcaprodutos`);

--
-- Índices para tabela `ordemservicodb`
--
ALTER TABLE `ordemservicodb`
  ADD PRIMARY KEY (`id_ordemservico`);

--
-- Índices para tabela `pessoasfisicas`
--
ALTER TABLE `pessoasfisicas`
  ADD PRIMARY KEY (`id_pessoa`);

--
-- Índices para tabela `pessoasjuridicas`
--
ALTER TABLE `pessoasjuridicas`
  ADD PRIMARY KEY (`id_pessoa`);

--
-- Índices para tabela `planopagamento`
--
ALTER TABLE `planopagamento`
  ADD PRIMARY KEY (`id_plano_pagamento`);

--
-- Índices para tabela `produtosdb`
--
ALTER TABLE `produtosdb`
  ADD PRIMARY KEY (`id_produto`);

--
-- Índices para tabela `servico`
--
ALTER TABLE `servico`
  ADD PRIMARY KEY (`id_servico`);

--
-- Índices para tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id_vendas`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cadastros1`
--
ALTER TABLE `cadastros1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `cidadepessoas`
--
ALTER TABLE `cidadepessoas`
  MODIFY `id_cidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `compra`
--
ALTER TABLE `compra`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `contaspagar`
--
ALTER TABLE `contaspagar`
  MODIFY `id_contas_pagar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `contasreceber`
--
ALTER TABLE `contasreceber`
  MODIFY `id_contas_receber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `grupoprodutos`
--
ALTER TABLE `grupoprodutos`
  MODIFY `id_Grupo_produtos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `itemcompra`
--
ALTER TABLE `itemcompra`
  MODIFY `id_item_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `itemservico`
--
ALTER TABLE `itemservico`
  MODIFY `id_item_servico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `itemvenda`
--
ALTER TABLE `itemvenda`
  MODIFY `id_item_venda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `marcaprodutos`
--
ALTER TABLE `marcaprodutos`
  MODIFY `id_marcaprodutos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `ordemservicodb`
--
ALTER TABLE `ordemservicodb`
  MODIFY `id_ordemservico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `pessoasfisicas`
--
ALTER TABLE `pessoasfisicas`
  MODIFY `id_pessoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `planopagamento`
--
ALTER TABLE `planopagamento`
  MODIFY `id_plano_pagamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `produtosdb`
--
ALTER TABLE `produtosdb`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `servico`
--
ALTER TABLE `servico`
  MODIFY `id_servico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id_vendas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `itemvenda`
--
ALTER TABLE `itemvenda`
  ADD CONSTRAINT `itemvenda_ibfk_1` FOREIGN KEY (`id_item_venda`) REFERENCES `vendas` (`id_vendas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
